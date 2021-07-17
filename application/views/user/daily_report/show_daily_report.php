<h1 class="brand-header">日報詳細</h1>
<div class="main-wrap">
  <div class="panel panel-success">
    <div class="panel-heading">
        <?php echo $dailyReport['reporting_time'] ?>の日報
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <th class="table-column">Title</th>
            <td class="td-text"><?php echo $dailyReport['title'] ?></td>
          </tr>
          <tr>
            <th class="table-column">Content</th>
            <td class='td-text'><?php echo $dailyReport['content'] ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="btn-bottom-wrapper">
    <a class="btn btn-edit" href="<?php echo site_url('report/'. $dailyReport['id']  . '/edit'); ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
    <div class="btn-delete">
      <?php echo form_open('report/' . $dailyReport['id'] . '/delete', array('method'=>'post')); ?>
        <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-danger', 'content' => '<i class="fa fa-trash-o"></i>')) ?>
      </form>
    </div>
  </div>
</div>