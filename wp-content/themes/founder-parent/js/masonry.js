//masonry
jQuery(function($){
    var $container = $('#masonry');
    $container.imagesLoaded( function(){
      $container.masonry({
        itemSelector : '.masonry-item'
            });
        });
    });
