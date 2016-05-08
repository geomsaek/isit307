<?php

    class Node {

          public $info;
          public $left;
          public $right;
          public $level;

          public function __construct($info) {
                 $this->info = $info;
                 $this->left = NULL;
                 $this->right = NULL;
                 $this->level = NULL;
          }

          public function __toString() {

                 return "$this->info";
          }
    }  


    class SearchBinaryTree {

          public $root;

          public function  __construct() {
                 $this->root = NULL;
          }
  
          public function create($info) {
              
                 if($this->root == NULL) {

                    $this->root = new Node($info);

                 } else {
  
                    $current = $this->root;

                    while(true) {

                          if($info > $current->info) {
                         
                                if($current->left) {
                                   $current = $current->left;
                                } else {
                                   $current->left = new Node($info);
                                   break; 
                                }

                          } else if($info < $current->info){

                                if($current->right) {
                                   $current = $current->right;
                                } else {
                                   $current->right = new Node($info);
                                   break; 
                                }

                          } else {

                            break;
                          }
                    } 
                 }
          }

          public function traverse($method) {

                 switch($method) {

                     case 'inorder':
                     $this->_inorder($this->root);
                     break;

                     default:
                     break;
                 } 

          } 

          private function _inorder($node) {

                          if($node->left) {
                             $this->_inorder($node->left); 
                          } 

                          echo $node. " ";

                          if($node->right) {
                             $this->_inorder($node->right); 
                          } 
          }
    } 
   
	echo"<h1>Binary Search Tree: Reverse Order</h1>"; 

	echo"<h1>Array One</h1>"; 
	$arrOne = array(8,3,1,6,4,7,10,14,13);

	$tree = new SearchBinaryTree();
	for($i=0,$n=count($arrOne);$i<$n;$i++) {
	   $tree->create($arrOne[$i]);
	}

	print_r($arrOne);
	echo "<br />";
	$tree->traverse('inorder');
	
	
	echo"<h1>Array Two</h1>"; 
	$arrOne = array(2332,421,135,2,3,45,321,8,6,9,1);

	$tree = new SearchBinaryTree();
	for($i=0,$n=count($arrOne);$i<$n;$i++) {
	   $tree->create($arrOne[$i]);
	}

	print_r($arrOne);
	echo "<br />";
	$tree->traverse('inorder');
	
	echo"<h1>Array Three</h1>"; 
	$arrOne = array(23,14,345,465,46,456,457,23,124234,758,32234,123,123,11,31,5,0);

	$tree = new SearchBinaryTree();
	for($i=0,$n=count($arrOne);$i<$n;$i++) {
	   $tree->create($arrOne[$i]);
	}

	print_r($arrOne);
	echo "<br />";
	$tree->traverse('inorder');

  
?>