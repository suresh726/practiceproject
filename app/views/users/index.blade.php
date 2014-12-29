<!DOCTYPE html>
<html lang="en">
{{ HTML::style('admin_root/css/bootstrap.css') }}
{{ HTML::style('admin_root/css/bootstrap-theme.css') }}

<div class="row">
<div class="row-fluid">
  <div class="span12">
    Fluid 12
    <div class="row-fluid">
      <div class="span6">
        Fluid 6
        <div class="row-fluid">
          <div class="span6">Fluid 6</div>
          <div class="span6">Fluid 6</div>
        </div>
      </div>
      <div class="span6">Fluid 6</div>
    </div>
  </div>
</div>
</html>
{{ HTML::script('admin_root/js/jquery-1.11.1.min.js') }}
{{ HTML::script('admin_root/js/bootstrap.min.js') }}