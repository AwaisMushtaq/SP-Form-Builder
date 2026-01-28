jQuery(document).ready(function($){

	$('.sp-field-item').draggable({
	    helper: 'clone',
	    revert: 'invalid',
	    cursor: 'move'
	})

	$('#sp-form-canvas').droppable({
	    accept: '.sp-field-item',
	    hoverClass: 'canvas-hover',
	    drop: function (event, ui) {

	      const fieldType = ui.draggable.data('type');

	      let fieldHTML = generateField(fieldType);

	      $('#sp-form-canvas .placeholder').remove();
	      $('#sp-form-canvas').append(fieldHTML);
	   }
	})

})

function generateField(type) {

  let html = '';

  switch (type) {
    case 'text':
      html = `
        <div class="form-field" data-type="text">
          <label>Text Field</label>
          <input type="text" />
        </div>
      `;
      break;

    case 'email':
      html = `
        <div class="form-field" data-type="email">
          <label>Email</label>
          <input type="email" />
        </div>
      `;
      break;

    case 'textarea':
      html = `
        <div class="form-field" data-type="textarea">
          <label>Textarea</label>
          <textarea></textarea>
        </div>
      `;
      break;
  }

  return html;
}