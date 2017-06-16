<?php

require_once 'src/controllers/Controller.php';
require_once 'src/logic/Repo.php';
require_once 'src/logic/SearchQuery.php';
require_once 'src/logic/GitHubApi.php';
require_once 'src/logic/IPService.php';

/**
 * Searching
 *
 * Class that shows repositories from GitHub according to username
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class Searching extends Controller {

    //Repo class
    private $repo;
    //SearchQuery class
    private $searchQuery;

    /**
     * Constructor
     * @access public
     */
    public function __construct() { 
        parent::__construct();
        $this->repo = new Repo();
        $this->searchQuery = new SearchQuery();
        $this->view = "searching.html";
    }

    /**
     * It gets repos from GitHub API
     * @access public
     */
    public function work(){
        if (isset($_POST["user"])){
            //user param must be valid string
            if($_POST["user"] !== ''){
                //get repos via GitHub API
                $gitHubApi = new GitHubApi();
                $response =  $gitHubApi->getGitHubRepos($_POST['user']);

                //save data if response is not empty or it is an array
                if (!empty($response) && is_array($response)) {
                    $this->saveGitHubData($response, $_POST['user']);
                } else {
                    $this->message = "Error: Username does not exist or there is a problem with GitHub API";
                }
            } else {
                $this->message = "Error: You have to set a valid username";
            }
        }
    }

    /**
     * IT prepares the data for storage in a database
     * @param array $repos Repositories
     * @param string $user Username
     * @access private
     */
    private function saveGitHubData($repos, $user){

        //load ip address
        $ipService = new IPService();

        //save search query and get its id
        $queryId = $this->searchQuery->insert(
            ['query' => $user,
             'ip' => $ipService->getIP()]
        );

        //each repository save to db
        foreach ($repos as $repo){
            $this->repo->insert(
                ['name' => $repo->name,
                 'description' => $repo->description,
                 'url' => $repo->svn_url,
                 'stargazers_count' => $repo->stargazers_count,
                 'language' => $repo->language,
                 'created_at' => $repo->created_at,
                 'query_id' => $queryId]
            );
        }

        //return repos to controller var
        $this->repos = $this->repo->getByQueryId($queryId);
    }
}
