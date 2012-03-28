<h2><?php echo $title?></h2>
<div>
<?php echo $jscode;?>
<?php echo  Form::open(Request::current()).
Form::label('search', __('Place to find').': ').
Form::input('search',NULL,array('size'=>'50')).
Form::submit('search_submit', __('Search')).
Form::close(); echo $error?>

<div id="map-canvas" style="width:550px;height:450px"></div>

<?php echo  Form::open(Request::current()).
Form::label('lat', 'Lat: ').
Form::input('lat',NULL,array('id'=>'lat')).
Form::label('lat', ' Lng: ').
Form::input('lng',NULL,array('id'=>'lng')).
Form::submit('submit', __('Save')).
Form::close();?>
</div>