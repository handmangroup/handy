/**
 * @file
 * Global utilities.
 *
 */
(function ($, Drupal) {

  'use strict';

  //////////////// CKEditor settings
  Drupal.behaviors.Ckeditor = {
    attach: function (context, settings) {
      // Alter CKEditor config to allow empty tags
      if (typeof CKEDITOR !== "undefined") {
        CKEDITOR.dtd.$removeEmpty['i'] = false;
        CKEDITOR.dtd.$removeEmpty['span'] = false;
        console.log('Ckeditor log', CKEDITOR.dtd);
      }
    }
  };

  //////////////// Disable input on Layout Paragraph Builder
  Drupal.behaviors.LPB = {
    attach: function (context, settings) {
      $('.js-lpb-component .block-contact textarea, .js-lpb-component .block-contact input, .js-lpb-component .block-simplenews input, .js-lpb-component .block-user input').each(function() {
        var thisElement = $(this);
        thisElement.attr('disabled', 'disabled');
    });
    }
  };

  //////////////// Project List 1 - Odd and even rows
  Drupal.behaviors.ProjectList1 = {
    attach: function (context, settings) {
      $('#projects-list-1 .project.item').each(function(index, element) {
        var thisItem = $(this),
            thisItemImage = thisItem.find('figure'),
            thisItemDetail = thisItem.find('.project-details');
        thisItemDetail.css('bottom', '25%');
        if (index % 2 == 0) {
          thisItemImage.addClass('offset-xl-1');
          thisItemDetail.css('right', '10%');
        } else {
          thisItemImage.addClass('offset-xl-4');
          thisItemDetail.css('left', '18%');
        }
      });
    }
  };

  //////////////// Move form labels to placeholders
  Drupal.behaviors.stackForms = {
    attach: function (context, settings) {
      $("form#contact-message-feedback-form :input, form.user-form :input, form.user-login-form :input, form.user-pass :input, .block-simplenews form :input").each(function(index, elem) {
        var eId = $(elem).attr("id");
        var label = null;
        if (eId && (label = $(elem).parents("form").find("label[for="+eId+"]")).length == 1) {
            $(elem).attr("placeholder", $(label).html());
            $(label).remove();
        }
      });
    }
  };

  //////////////// Menus and Dropdowns
  Drupal.behaviors.Dropdowns = {
    attach: function (context, settings) {
      $('.dropdown-menu').each(function() {
       if($(this).parents('nav.navbar').hasClass('navbar-bg-dark')) {
        $(this).addClass('dropdown-menu-dark');
      }
      });
      $('nav.navbar').each(function() {
        if ($(this).hasClass('bg-primary')) {
          $(this).find('ul li a').addClass('text-bg-primary');
        }

      });

    }
  };

})(jQuery, Drupal);
