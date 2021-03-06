// edit javascripts ##

// loader & script test ##
function ecoder_loaded_edit() {
   thediv = 'load_edit';
   if ( document.removeChild ) {
       var div = document.getElementById( thediv );
           div.parentNode.removeChild( div );           
   } else if ( document.getElementById ) {
       document.getElementById( thediv ).style.display = "none";
   }
}

// onload events ##
function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      oldonload();
      func();
    }
  }
}
