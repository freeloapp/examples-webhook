<?php

$notifikacniEmail = "info@freelo.cz";

$rawJson = file_get_contents('php://input');
$data = json_decode($rawJson, true);

if( $data['type'] === 'task_deleted' )
{
  $email = sprintf("User %s deleted task %s: https://app.freelo.cz/task/%s", $data['author']['fullname'], $data['data']['name'], $data['data']['id']);
  mail($notifikacniEmail, "Hey, there is deleted task", $email, "Content-Type: text/plain; charset=UTF-8");
}
