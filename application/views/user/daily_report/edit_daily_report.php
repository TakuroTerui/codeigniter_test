<h1 class="brand-header">日報編集</h1>
<div class="main-wrap">
  <div class="container">
    <?php echo form_open('report/' . $dailyReport['id'] . '/edit', array('method'=>'POST')); ?>
      <div class="form-group form-size-small <?php if (form_error('date')): ?>
         has-error
      <?php endif; ?>">
        <?php echo form_input(array('name' => 'date', 'type' => 'date', 'class' => 'form-control', 'value' => $dailyReport['reporting_time'])) ?>
        <span class="help-block"></span>
      </div>
      <div class="form-group <?php if (form_error('date')): ?>
        has-error
      <?php endif; ?>">
        <?php echo form_input(array('name' => 'title', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Title', 'value' => $dailyReport['title'])) ?>
        <span class="help-block"></span>
      </div>
      <div class="form-group <?php if (form_error('date')): ?>
        has-error
      <?php endif; ?>">
        <?php echo form_textarea(array('name' => 'content', 'class' => 'form-control', 'placeholder' => 'Content', 'cols' => 50, 'rows' => 10, 'value' => $dailyReport['content'])) ?>
        <span class="help-block"></span>
      </div>
      <?php echo form_input(array('name' => 'submit', 'type' => 'submit', 'class' => 'btn btn-success pull-right', 'value' => 'Add')) ?>
    </form>
  </div>
</div>