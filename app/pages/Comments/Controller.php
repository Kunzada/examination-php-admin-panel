<?php

class Controller_Comments extends Controller
{
    function __construct()
    {
        $this->model = new Model_Comments();
        $this->view = new View();
    }
    function action_comments()
    {
        $data["title"] = "Comments";
        $data["comments"] = $this->model->getAllComments();
        $data["users"] = $this->model->getAllUsers();
        $data["products"] = $this->model->getAllProducts();
        if (!empty($_POST['commentid'])) {

            $categoryId = $_POST['commentid'];

            $deleted = $this->model->deleteComment($categoryId);

            if ($deleted > 0) {
                header("Location: /exam/comments/comments");
                exit();
            } else {
                $data["error"] = "Failed to delete category.";

                $this->view->generate("app/pages/comments/comments.php", "app/layouts/home.php", $data);
                exit();
            }
        } else {

            $this->view->generate("app/pages/Comments/comments.php", "app/layouts/home.php", $data);
        }
    }
    public function action_addComments()
    {
        $data["title"] = "Add Categories";
        $data["products"] = $this->model->getAllProducts();
        $data["comments"] = $this->model->getAllComments();

        if (!empty($_POST)) {
            $user = [];
            $user["user_id"] = $_SESSION["user"]->id;
            $user["product_id"] = $_POST["product_id"];
            $user["votes"] = $_POST["votes"];
            $user["description"] = $_POST["description"];
            $newComment = $this->model->createComment($user);
            if ($newComment > 0) {
                header("Location: /exam/comments/comments");
            } else {
                // Handle user creation failure
                // $data['error']="Something went wrong, please try again";
                $this->view->generate("app/pages/Comments/comments.php", "app/layouts/base.php", $data);
            }
        } else {

            $this->view->generate("app/pages/Comments/addComment.php", "app/layouts/home.php", $data);
        }
    }
}
