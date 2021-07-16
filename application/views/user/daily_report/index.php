<h2 class="brand-header">日報一覧</h2>
<div class="main-wrap">
  <div class="btn-wrapper daily-report">
    <!-- TODO 日報検索機能 -->
    <?php echo form_open('report', array('method'=>'GET')); ?>
      <?php echo form_input(array('text' => 'date', 'type' => 'month', 'class' => 'form-control', 'name' => 'reporting_time')) ?>
      <?php echo form_button(array('type' => 'submit', 'class' => 'btn btn-icon', 'content' => '<i class="fa fa-search"></i>')) ?>
    </form>
    <a class="btn btn-icon" href="<?php echo site_url('report/create'); ?>"><i class="fa fa-plus"></i></a>
  </div>
  <div class="content-wrapper table-responsive">
    <table class="table table-striped">
      <thead>
        <tr class="row">
          <th class="col-xs-2">Date</th>
          <th class="col-xs-3">Title</th>
          <th class="col-xs-5">Content</th>
          <th class="col-xs-2"></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($dailyReports as $dailyReport): ?>
        <tr class="row">
          <td class="col-xs-2"><?php echo date('m/d(D)', strtotime($dailyReport['reporting_time'])) ?></td>
          <td class="col-xs-3"><?php echo $dailyReport['title'] ?></td>
          <td class="col-xs-5"><?php echo $dailyReport['content'] ?></td>
          <td class="col-xs-2"><a class="btn" href=""><i class="fa fa-book"></i></a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
      <?php echo $pagination; ?>
    </table>
  </div>
</div>