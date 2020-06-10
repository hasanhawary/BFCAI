    $(document).ready(function () {
        $('.repeater').repeater({
            // (Optional)
            // start with an empty list of repeaters. Set your first (and only)
            // "data-repeater-item" with style="display:none;" and pass the
            // following configuration flag
            initEmpty: true,
            // (Optional)
            // "defaultValues" sets the values of added items.  The keys of
            // defaultValues refer to the value of the input's name attribute.
            // If a default value is not specified for an input, then it will
            // have its value cleared.
            defaultValues: {
                'text-input': 'foo'
            },
            // (Optional)
            // "show" is called just after an item is added.  The item is hidden
            // at this point.  If a show callback is not given the item will
            // have $(this).show() called on it.
            show: function () {
                $(this).slideDown();
            },
            // (Optional)
            // "hide" is called when a user clicks on a data-repeater-delete
            // element.  The item is still visible.  "hide" is passed a function
            // as its first argument which will properly remove the item.
            // "hide" allows for a confirmation step, to send a delete request
            // to the server, etc.  If a hide callback is not given the item
            // will be deleted.
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            // (Optional)
            // You can use this if you need to manually re-index the list
            // for example if you are using a drag and drop library to reorder
            // list items.
            // (Optional)
            // Removes the delete button from the first list item,
            // defaults to false.
            isFirstItemUndeletable: true
        })
		
		
		
		

    });
	
	
	
	
$(document).ready(function() {
  
  $('#deleteRow').on('shown.bs.modal', function(e) {
    // store the clicked element as data on the confirm button
    $('#confirmDeleteBtn').data('triggered-from', e.relatedTarget);
  });
  
  $("#confirmDeleteBtn").click(function() {
    // retrieve the button that triggered the action and use it
    var trigger = $(this).data('triggered-from');
    $(trigger).closest('#mainCategory .col-md-12').remove();
    $('#deleteRow').modal('hide');
  });
  
});
	
	
$(document).ready(function() {
  
  $('#deleteRow').on('shown.bs.modal', function(e) {
    // store the clicked element as data on the confirm button
    $('#confirmDeleteBtn').data('triggered-from', e.relatedTarget);
  });
  
  $("#confirmDeleteBtn").click(function() {
    // retrieve the button that triggered the action and use it
    var trigger = $(this).data('triggered-from');
    $(trigger).closest('#subCategory .col-md-12').remove();
    $('#deleteRow').modal('hide');
  });
  
});



$(document).ready(function() {
  
  $('#deleteRow').on('shown.bs.modal', function(e) {
    // store the clicked element as data on the confirm button
    $('#confirmDeleteBtn').data('triggered-from', e.relatedTarget);
  });
  
  $("#confirmDeleteBtn").click(function() {
    // retrieve the button that triggered the action and use it
    var trigger = $(this).data('triggered-from');
    $(trigger).closest('tr').remove();
    $('#deleteRow').modal('hide');
  });
  
});
	
	
/** autoCalc **/
function autoCalcSetup() {
  $('table').jAutoCalc('destroy');
  $('table tr').jAutoCalc({
    keyEventsFire: true,
    decimalPlaces: 2,
    emptyAsZero: true
  });
  $('table').jAutoCalc({
    decimalPlaces: 2,
    emptyAsZero: true
  });
}
$(document).ready(function() {
  autoCalcSetup();
  $('body').on('click', '.btn-addMoreField', function() {
    setTimeout(function() {
      autoCalcSetup();
    }, 300);
  });
});
