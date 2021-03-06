<?php
/**
 * Populates option elements
 *
 * Takes an array which is fetched data from database, as an argument, loops over them,
 * populates option elements with values from the array.
 *
 * @param array $projects
 * @return string
 */
function populateDropdown(array $projects) : string {
    $html = '';
    foreach ($projects as $project) {
        $html .= '<option value="' . $project['id'] . '">' . $project['p_title'] . '</option>';
    }
    return $html;
}

/**
 * Populates list elements
 *
 * Takes an array which is fetched data from database, as an argument, loops over them,
 * populates list elements with values from the array.
 *
 * @param array $projects
 * @return string
 */
function populateProject(array $projects) : string {
    $html = '';
    foreach ($projects as $project) {
        $html .= '<li class="project project' . $project['id'] . '"
                    style="background-image: url(\'' . $project['bg_image_url'] . '\')">
                        <div class="hidden-project-info">
                            <h3>' . $project['p_title'] . '</h3>
                            <p>' . $project['p_content'] . '</p>
                            <div class="code-nav-buttons">
                                <a href="' . $project['code_url'] . '" target="_blank">CODE</a>
                                <a href="' . $project['see_url'] . '" target="_blank">SEE ?</a>
                            </div>
                        </div>
                    </li>';
    }
    return $html;
}

/**
 * Checks if an array of keys exist in a given array
 *
 * Takes in a $keys array and $array to be checked from,
 * flips the key/value pairs of $keys,
 * compares keys from flipped $keys with $array
 *
 * Original post from > https://stackoverflow.com/questions/13169588/how-to-check-if-multiple-array-keys-exists
 *
 * @param1 array $keys
 * @param2 array $array
 * @return boolean
 */
function isKeyExist(array $keys, array $array) : bool {
    return !array_diff_key(array_flip($keys), $array);
}
?>