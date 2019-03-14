 <section class="content" onload="initialize()">
   <div class="box">
      <div class="box-header">
          <h3 class="box-title">All Review for these Listing</h3>
          <a style="float: right; width: 15%;" href="<?= base_url('admin/'.$this->uri->segment(5)); ?>" class="btn btn-default btn-xs"><< Back</a>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped ">
          <thead>
            <tr>
              <th>lv ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Image</th>
              <th>title</th>
              <th>Description</th>
              <th>Ratings</th>
              <th>Date Created</th>
              <th>Date Modified</th>
              <th>Status</th>
              <th class="text-right">Options</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($all_reviews as $row):  //echo "<pre>"; print_r($row);?>
            <tr>
              <td><?= $row['listing_review_id']; ?></td>
              <td><?= $row['name']; ?></td>
              <td><?= $row['email']; ?></td>
              <td>
                <?php if(!empty($row['image'])){ ?>
                <img src="<?= $row['image']; ?>" style="width: 50%;">
                <?php }else{ ?>
                <img src="<?php echo base_url(); ?>/assets/images/dummyuser.jpg">
                <?php } ?>
              </td>
              <td><?= $row['title']; ?></td>
              <td><?= $row['description']; ?></td>
              <td><span id=stars<?= $row['listing_review_id']; ?>></span></td>
              <td><?= $row['date_created']; ?></td>
              <td><?= $row['date_modified']; ?></td>
              <td><?php 
                  if($row['status'] == 1){
                    $status = '<strong><font color="green">Approved</font></strong>';
                    $opp_stat = 0;
                  }else{    
                    $status = '<strong><font color="red">Pending</font></strong>';
                    $opp_stat = 1;
                  }
                  ?> 
                  <a href="<?php echo base_url('admin/listing_reviews/status_change/'.$row['listing_review_id'].'/'.$row['listings_id'].'/'.$opp_stat.'/'.$this->uri->segment(5));?>"><?php echo $status;?></a>
              </td>
              <td class="text-right option_td">
                  <a href="<?= base_url('admin/listing_reviews/edit/'.$row['listing_review_id'].'/'.$row['listings_id'].'/'.$this->uri->segment(5)); ?>" class="btn btn-info btn-flat">Edit</a>
                  <a href="javascript:void(0);" onclick="ConfirmDelete(<?php echo $row['listing_review_id']; ?>)" class="btn btn-danger btn-flat">Delete</a>
              </td>                            
            </tr>
            <script>
                document.getElementById("stars<?= $row['listing_review_id']; ?>").innerHTML = getStars(<?php echo $row['ratings'] ?>);
                function getStars(rating) {
                  // Round to nearest half
                  rating = Math.round(rating * 2) / 2;
                  let output = [];
                  // Append all the filled whole stars
                  for (var i = rating; i >= 1; i--)
                    output.push('<i class="fa fa-star" aria-hidden="true" style="color: #f39c12;"></i>&nbsp;');
                  // If there is a half a star, append it
                  if (i == .5) output.push('<i class="fa fa-star-half-o" aria-hidden="true" style="color: #f39c12;"></i>&nbsp;');
                  // Fill the empty stars
                  for (let i = (5 - rating); i >= 1; i--)
                    output.push('<i class="fa fa-star-o" aria-hidden="true" style="color: #f39c12;"></i>&nbsp;');
                  return output.join('');
                }              
            </script>            
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
  </div>
  <!-- /.box -->
</section> 
<script type="text/javascript">
    <?php if($this->uri->segment(5) == "church"){ ?>
      $("#church").addClass('active');
    <?php }elseif($this->uri->segment(5) == "choir"){ ?>
      $("#choir").addClass('active');
    <?php }elseif($this->uri->segment(5) == "band"){ ?>
      $("#band").addClass('active');
    <?php } ?>

    function ConfirmDelete(ID){
      var gourl = '<?= base_url('admin/listing_reviews/del/'); ?>'+ID+'.<?php echo '/'.$this->uri->segment(5);?>';
          if (confirm("<?php if($this->lang->line('delete_alert')){echo $this->lang->line('delete_alert');}else{ echo "Are you sure you want to delete this data?";} ?>"))
               location.href = gourl;
    }
</script> 
