<?php

/**
 * GitHub API
 *
 * Class that gets repos from GitHub
 *
 * @author jkmas <jkmasg@gmail.com>
 * @version 0.0.1
 * @access public
 */
class GitHubApi {

    //api url to get repos by username
    private $userRepoUrl = "https://api.github.com/users/%s/repos";

    /**
     * Get repositories by username via curl
     * @access public
     * @param string $user Username
     * @return mixed Response from GitHub API
     *
     * UserAgent have to be specified due to GitHub API
     * @see https://davidwalsh.name/set-user-agent-php-curl-spoof
     */
    public function getGitHubRepos($user){
        $requestUrl = sprintf($this->userRepoUrl, $user);

        $curl = curl_init();
        curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($curl, CURLOPT_URL, $requestUrl);
        //return the transfer as a string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        curl_close($curl);

        return json_decode($response);
    }
}

