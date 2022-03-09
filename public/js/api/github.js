const base_url = "https://api.github.com/";

function ajaxFunction(target) {
    let resultJSON = null;
    $.ajax({
        url: target,
        method: 'GET',
        dataType: 'json',
        async : false,
        success: function(result) {
            resultJSON = result;
        },
        error: function (error){
            console.error("Error in Fetching");
        }
    });
    return resultJSON;
}


function getUser(username) {
    let sub_url = `users/${username}`;
    return ajaxFunction(base_url + sub_url);
}


function getRepos(username) {
    let sub_url = `users/${username}/repos`;
    return ajaxFunction(base_url + sub_url);
}

function getRepo(username, repo_name) {
    let sub_url = `repos/${username}/${repo_name}`;
    return ajaxFunction(base_url+sub_url);
}

function getCommits(username, repo_name) {
    let sub_url = `repos/${username}/${repo_name}/commits`
    return ajaxFunction(base_url+sub_url);
}

function getCommitMessages(username, repo_name) {
    let commitsJSON = getCommits(username, repo_name);

    let commitMessages = [];
    commitsJSON.forEach((commit) => {
        commitMessages.push(commit["commit"]["message"]);
    });

    return commitMessages.reverse();
}

function getLanguages(username, repo_name) {
    let sub_url = `repos/${username}/${repo_name}/languages`;
    return ajaxFunction(base_url+sub_url);
}

function getAvatar(username) {
    return getUser(username).avatar_url;
}
