<?php
namespace App\Controllers;
use App\Models\Blog;

class BlogsController extends BaseController {
    public function showBlogAction($request)
    {
        $uri=  explode('/',$request->getRequestTarget());
        $id = end ($uri);
 
        $blog = Blog::find($id);
        $comments = Blog::find($id)->comments;
        return $this->renderHTML('showBlog.twig', array(
            'blog'      => $blog,
            'comments'   => $comments
        ));
    }
}

?>