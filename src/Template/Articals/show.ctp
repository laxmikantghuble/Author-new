<div class="row card">
  <div class="card col-md-12">
    <div class="header"></div>

      <div class="card-body col-md-12">        
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th>Sr.No</th>
                <th>Artical Name</th>
                <th>Tags</th>
                <th>Description/Content</th>
                <th>Artical Media</th>
                <th>Comments</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $cnt=1;
            foreach($articals as $key => $artdata)
            {
            ?>
              <tr>
                <td><?=$cnt++;?></td>
                <td><?=$artdata->title;?></td>
                <td><?=$artdata->tags;?></td>
                <td><?=$artdata->description;?></td>
                <td>
                <?php 
                if(!empty($artdata->articalimage))
                $artimg = $artdata->articalimage;
                else 
                $artimg = 'img/default-artical.png';
                ?>
                <img src="<?=$baseurl.$artimg;?>" width="100"></td>
                <td>
                <ul>
                <?php 
                  foreach($artdata->comments as $comment)
                  {
                    if($comment->comment!="")
                    ?>
                    <li class="nav-item"><?=$comment->comment;?>   
                    </li>
                    <?php
                  }
                  ?>
                  </ul>

                </td>
                <td>
                <?php 
                if($this->request->session()->read('Auth.User.user_id')==$artdata->user_id)
                {
                ?>
                <a href="<?=$baseurl.'artical/edit/'.$artdata->artical_id;?>" class="btn btn-info">Edit</a>
                <a href="<?=$baseurl.'artical/delete/'.$artdata->artical_id;?>" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$artdata->artical_id;?>" >Delete</a>
                
                <a href="<?=$baseurl.'artical/delete/'.$artdata->artical_id;?>" class="btn btn-warning" data-toggle="modal" data-target="#commentModal<?=$artdata->artical_id;?>" >Comment</a>
                <?php 
                }else
                {
                 ?>
                  <a href="<?=$baseurl.'artical/delete/'.$artdata->artical_id;?>" class="btn btn-warning" data-toggle="modal" data-target="#commentModal<?=$artdata->artical_id;?>" >Comment</a>
                <?php 
                }
                ?>
                </td>

                <div class="modal fade" id="exampleModal<?=$artdata->artical_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <?php 
                     echo $this->Form->create(
                    null,[
                    'class'=>'form-horizontal',
                    'method'=>'post',
                    'id'=>'frm-sign',
                    'action'=>'delete/'.$artdata->artical_id,
                    ]           
                  );
                  ?>                     
                                                     
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Are you sure want to delete this article?
                        </div>
                        <div class="modal-footer">                                    
                          <button type="submit" class="btn btn-primary">Delete</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                  <?php 
                    echo $this->Form->end();
                  ?>
                    </div>
                  </div>

                   <div class="modal fade" id="commentModal<?=$artdata->artical_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <?php 
                     echo $this->Form->create(
                    null,[
                    'class'=>'form-horizontal',
                    'method'=>'post',
                    'id'=>'frm-sign',
                    'action'=>'commentsave',
                    ]           
                  );
                  ?>                     
                                                     
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Comment</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         <div class="form-group">
                          <label for="username">Comment:</label>
                          <textarea class="form-control" name="comment" cols="15" rows="5"></textarea>
                        </div>

                        </div>
                        <div class="modal-footer"> 
                          <input type="hidden" name="articalid" id="articalid" value="<?=$artdata->artical_id;?>" >                              
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                  <?php 
                    echo $this->Form->end();
                  ?>
                    </div>
                  </div>

              </tr>
              <?php 
              }
              ?>
            </tbody>
          </table>

          <?php 
          $paginator = $this->Paginator->setTemplates(
          ['number'=>'<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
          'current'=>'<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
          'first'=>'<li class="page-item"><a href="{{url}}" class="page-link">&laquo;</a></li>',
          'last'=>'<li class="page-item"><a href="{{url}}" class="page-link">&raquo;</a></li>',
          'prevActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&lt;</a></li>',
          'nextActive'=>'<li class="page-item"><a href="{{url}}" class="page-link">&gt;</a></li>'
          ])
          ?>
          <nav>
          <ul class="pagination">
          <?php 
          echo $paginator->first();
          if($paginator->hasPrev())
          {
           $paginator->prev();
          }
            echo $paginator->numbers();

          if($paginator->hasNext())
          {
           $paginator->next();
          }
          echo $paginator->last();
          ?>
          </ul>
          </nav>

          </div>
    </div>
</div>