// (function($) {
//   'use strict';

//   $(document).ready(function() {

//     const field = (value) => '<div class="form-group" style="margin-bottom: 0px;"><div class="input-group"><input type="text" name="in_edit_input" value="'+ value +'" class="form-control" /><div class="input-group-append"><span class="input-group-text"><i class="mdi mdi-check-circle-outline mdi-18px"></i></span></div></div></div>';
//     const inline_edit = '<a class="inline-edit"><i class="mdi mdi-pencil-outline mdi-18px"></i></a>';
//     const update_edit = '<a class="update-edit" style="display:none;"><i class="mdi mdi-check mdi-18px"></i></a>';
//     const cancel_edit = '<a class="cancel-edit" style="display:none;"><i class="mdi mdi-close mdi-18px"></i></a>';

//     var textValue;
//     var last_element = null;
//     var id;
//     var ac;
//     var cancel_btn = $('#to-cancel-' + id);
//     var update_btn = $('#to-update-' + id);
//     var edit_btn   = $('#to-edit-' + id);

//     $('.editable-inline tr').on('mouseover', function() {
//       // id = $('tr td .editable-btn').attr('e-id');
//       // ac = $('tr td .editable-btn').attr('a-id');
//       // $('tr td .editable-btn').append(inline_edit);
//     });

//     /**
//      * Edit button
//      */
//     $('.in-edit').on('click', function(){

//       show_field($(this));

//     });

//     /**
//      * Cancel button
//      */
//     $('.cancel-edit').on('click', function(){

//       hide_elements( $(this) );

//     });

//     /**
//      * Inline edit
//      */
//     function show_field(element) {

//       action = element.attr('ac-id');
//       id = element.attr('e-id');
      
//       cancel_btn = $('#to-cancel-' + id);
//       update_btn = $('#to-update-' + id);
//       edit_btn   = $('#to-edit-' + id);

//       textValue = capitalize( $('#to-edit-content-' + id).text() );

//       switch (action) {
//         case 'cat':
//           $('#to-edit-content-' + id).html(field(textValue));
//           show_elements($('input[name="in_edit_input"]'), edit_btn, cancel_btn, update_btn );

//           last_element = element;
//           break;
//         case 'sub':

//           break;
//         default:
//           break;
//       }
//     }

//     /**
//      * Show elements
//      */
//     function show_elements(el, edit_btn, cancel_btn, update_btn ) {
//       input_icon(el);
//       edit_btn.hide();
//       cancel_btn.show();
//       update_btn.show();
//     }

//     /**
//      * Hide elements
//      */
//     function hide_elements( element ) {

//       action = element.attr('ac-id');
//       id = element.attr('e-id');

//       cancel_btn = $('#to-cancel-' + id);
//       update_btn = $('#to-update-' + id);
//       edit_btn   = $('#to-edit-' + id);

//       switch (action) {
//         case 'cat':
//           $('#to-edit-content-' + id).html(textValue);
//           edit_btn.show();
//           cancel_btn.hide();
//           update_btn.hide();
//           break;
//         case 'sub':

//           break;
//         default:
//           break;
//       }
//     }
//   });
// })(jQuery);