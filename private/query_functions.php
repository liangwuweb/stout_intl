<?php
//Keywords
function find_all_keywords()
{
  global $db;

  $sql = "SELECT * FROM keywords ";
  $sql .= "ORDER BY id ASC ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_keyword_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM keywords ";
  $sql .= "WHERE id = '" . db_escape($db, $id) . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $keyword = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $keyword;
}

function find_keyword_by_keywords_id($keywords_id)
{
  global $db;

  $sql = "SELECT name FROM keywords ";
  $sql .= "WHERE id='" . db_escape($db, $keywords_id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $result = mysqli_fetch_assoc($result);
  return $result;
}

function insert_keyword($keyword)
{
  global $db;

  $sql = "INSERT INTO keywords ";
  $sql .= "(name) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db,  $keyword['name']) . "'";
  $sql .= ")";
  echo $sql;
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_keyword($keyword)
{
  global $db;

  $sql = "UPDATE keywords SET ";
  $sql .= "name ='" . $keyword['name'] . "'";
  $sql .= "WHERE id='" . $keyword['id'] . "'";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_keyword($id)
{
  global $db;

  $sql = "DELETE FROM keywords ";
  $sql .= "WHERE id='" . $id . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  if ($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

//Posts
function find_all_posts()
{
  global $db;

  $sql = "SELECT * FROM posts ";
  $sql .= "ORDER BY id ASC ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_all_posts_content()
{
  global $db;

  $sql = "SELECT SUBSTRING(content, 1 , 250) ";
  $sql .= "AS ExtractString FROM posts ";
  $sql .= "ORDER BY id ASC ";
  //echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_post_content_by_id($id)
{
  global $db;

  $sql = "SELECT SUBSTRING(content, 1 , 200) ";
  $sql .= "AS ExtractString FROM posts ";
  $sql .= "WHERE id ='" . db_escape($db, $id) . "' ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_post_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM posts ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $post = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $post; // returns an assoc. array
}

function insert_post($post)
{
  global $db;

  $sql = "INSERT INTO posts ";
  $sql .= "(title, keywords, visible, content, timestamp, keywords_id) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db,  $post['title']) . "',";
  $sql .= "'',";
  $sql .= "'" . db_escape($db,  $post['visible']) . "',";
  $sql .= "'" . db_escape($db,  $post['content']) . "',";
  $sql .= "NOW(),";
  $sql .= "'" . db_escape($db,  $post['keywords_id']) . "'";
  $sql .= ")";
  echo $sql;
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_post($post)
{
  global $db;

  $sql = "UPDATE posts SET ";
  $sql .= "title='" . db_escape($db, $post['title']) . "', ";
  $sql .= "keywords_id='" . db_escape($db, $post['keywords_id']) . "', ";
  $sql .= "visible='" . db_escape($db, $post['visible']) . "', ";
  $sql .= "content='" . db_escape($db, $post['content']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $post['id']) . "' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_post($id)
{
  global $db;

  $sql = "DELETE FROM posts ";
  $sql .= "WHERE id= '" . $id . "'";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  if ($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

//Comments
function find_comments_by_post_id($post_id)
{
  global $db;

  $sql = "SELECT * FROM comments ";
  $sql .= "WHERE post_id = '" . db_escape($db, $post_id) . "'";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function insert_comment($comment)
{
  global $db;

  $sql = "INSERT INTO comments ";
  $sql .= "(admin_id, post_id, content) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db,  $comment['admin_id']) . "',";
  $sql .= "'" . db_escape($db,  $comment['post_id']) . "',";
  $sql .= "'" . db_escape($db,  $comment['content']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function find_comment_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM comments ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $comment = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $comment; // returns an assoc. array
}




// Admins
// Find all admins, ordered last_name, first_name
function find_all_admins()
{
  global $db;

  $sql = "SELECT * FROM admins ";
  $sql .= "ORDER BY last_name ASC, first_name ASC";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}

function find_admin_by_id($id)
{
  global $db;

  $sql = "SELECT * FROM admins ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $admin = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $admin; // returns an assoc. array
}

function find_admin_by_username($username)
{
  global $db;

  $sql = "SELECT * FROM admins ";
  $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $admin = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $admin; // returns an assoc. array
}


function validate_admin($admin)
{

  if (is_blank($admin['first_name'])) {
    $errors[] = "First name cannot be blank.";
  } elseif (!has_length($admin['first_name'], array('min' => 2, 'max' => 255))) {
    $errors[] = "First name must be between 2 and 255 characters.";
  }

  if (is_blank($admin['last_name'])) {
    $errors[] = "Last name cannot be blank.";
  } elseif (!has_length($admin['last_name'], array('min' => 2, 'max' => 255))) {
    $errors[] = "Last name must be between 2 and 255 characters.";
  }

  if (is_blank($admin['email'])) {
    $errors[] = "Email cannot be blank.";
  } elseif (!has_length($admin['email'], array('max' => 255))) {
    $errors[] = "Last name must be less than 255 characters.";
  }
  elseif (!has_valid_email_format($admin['email'])) {
    $errors[] = "Email must be a valid format.";
  }

  if (is_blank($admin['username'])) {
    $errors[] = "Username cannot be blank.";
  } elseif (!has_length($admin['username'], array('min' => 8, 'max' => 255))) {
    $errors[] = "Username must be between 8 and 255 characters.";
  }
  elseif (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
    $errors[] = "Username not allowed. Try another.";
  }

  if (is_blank($admin['password'])) {
    $errors[] = "Password cannot be blank.";
  } elseif (!has_length($admin['password'], array('min' => 12))) {
    $errors[] = "Password must contain 12 or more characters";
  }
  elseif (!preg_match('/[A-Z]/', $admin['password'])) {
    $errors[] = "Password must contain at least 1 uppercase letter";
  }
  elseif (!preg_match('/[a-z]/', $admin['password'])) {
    $errors[] = "Password must contain at least 1 lowercase letter";
  }
  elseif (!preg_match('/[0-9]/', $admin['password'])) {
    $errors[] = "Password must contain at least 1 number";
  }
  elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
    $errors[] = "Password must contain at least 1 symbol";
  }

  if (is_blank($admin['confirm_password'])) {
    $errors[] = "Confirm password cannot be blank.";
  } elseif ($admin['password'] !== $admin['confirm_password']) {
    $errors[] = "Password and confirm password must match.";
  }

  return $errors;
}

function insert_admin($admin)
{
  global $db;

  $errors = validate_admin($admin);
  if (!empty($errors)) {
    return $errors;
  }

  $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

  $sql = "INSERT INTO admins ";
  $sql .= "(first_name, last_name, email, username, hashed_password) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $admin['first_name']) . "',";
  $sql .= "'" . db_escape($db, $admin['last_name']) . "',";
  $sql .= "'" . db_escape($db, $admin['email']) . "',";
  $sql .= "'" . db_escape($db, $admin['username']) . "',";
  $sql .= "'" . db_escape($db, $hashed_password) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);

  // For INSERT statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function update_admin($admin)
{
  global $db;

  $errors = validate_admin($admin);
  if (!empty($errors)) {
    return $errors;
  }

  $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

  $sql = "UPDATE admins SET ";
  $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
  $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
  $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
  $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "',";
  $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
  $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  // For UPDATE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // UPDATE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

function delete_admin($admin)
{
  global $db;

  $sql = "DELETE FROM admins ";
  $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
  $sql .= "LIMIT 1;";
  $result = mysqli_query($db, $sql);

  // For DELETE statements, $result is true/false
  if ($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
