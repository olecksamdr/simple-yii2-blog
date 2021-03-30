<?php

namespace app\filters;

use yii\filters\AccessRule;
use app\models\Post;

// https://stackoverflow.com/questions/29239735/allow-only-author-to-edit-his-post-in-yii2-using-acf
class AuthorAccessRule extends AccessRule
{
  public $allow = true; // Allow access if this rule matches
  public $roles = ['@']; // Ensure user is logged in

  public function allows($action, $user, $request)
  {
    // Can be `null`, `false` or `true`.
    // True means the parent rule matched and allows access.
    $parentResult = parent::allows($action, $user, $request);

    if ($parentResult !== true) {
      return $parentResult;
    }

    return Post::isUserAuthorOfPost($user->id, $request->get('id'));
  }
}