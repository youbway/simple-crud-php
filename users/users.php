<?php 

function printr ($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function getUsers () 
{
    $users = file_get_contents(__DIR__ . '/users.json');
    $users = json_decode($users,true);
    return $users;
    // printr($users);
}

function getUserById ($id)
{
  $users = getUsers();
  foreach ($users as $key => $user) {
    if ($user['id'] == $id) {
      return $user;           
    } 
  }

  return null;
}

function createUser($user)
{
  $users = (array) getUsers();
  $user['id'] = random_int(1000000,2000000);
  return $user;
}

function updateUser ($id, $newUser)
{
  $users = getUsers();
  foreach ($users as $i => $user) {
    if ($user['id'] == $id) {
      $users[$i] =  array_merge($user, $newUser);
    }
  }
  // printr($users);
  
  saveAsJson($users);
}

function deleteUser ($id)
{
  $users = getUsers();

  foreach ($users as $i => $user) {
    if ($user['id'] == $id) {
      array_splice($users,$i,1);
    }
  }
  saveAsJson($users);
  // printr($users);
}


function uploadImage ($file, &$user) 
{
  
  if ($file['name'] !== '') {
    if (! is_dir(__DIR__. '/images')) {
      mkdir(__DIR__. '/images');  
    }
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    move_uploaded_file($file['tmp_name'], __DIR__. "/images/{$user['id']}.$ext");
    $user['extension'] = $ext;
  }  
}

function saveAsJson ($json) {

  file_put_contents(__DIR__ . '/users.json', json_encode($json,JSON_PRETTY_PRINT));
}

?>