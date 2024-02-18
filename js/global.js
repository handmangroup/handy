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

  //////////////// Section - Put gutter classes to row
  Drupal.behaviors.Section = {
    attach: function (context, settings) {
      $('section').each(function(index, element) {
        var thisSection = $(this),
            gutterClass = thisSection.attr('data-gutter-class') || '',
            contentAlignClass = thisSection.attr('data-content-align') || '',
            marginClass = thisSection.attr('data-margin') || '';
        thisSection.find('div[class*="container"] > .row').addClass([gutterClass, contentAlignClass, marginClass]);
      });
      $('div.paragraph--type--paragraph-layout').each(function(index, element) {
        var thisParagraph = $(this),
            gutterClass = thisParagraph.attr('data-gutter-class') || '',
            contentAlignClass = thisParagraph.attr('data-content-align') || '';
        thisParagraph.find('.row').addClass([gutterClass, contentAlignClass]);
      });
    }
  };

  //////////////// Accordion - Click to open/collapse
  Drupal.behaviors.Accordion = {
    attach: function (context, settings) {
      $('.accordion-title').click(function(){
        var accordion = $(this).closest('.accordion');
        var li = $(this).closest('li');
        if (li.hasClass('active')) {
          li.removeClass('active');
        } else {
          if (accordion.hasClass('accordion-oneopen')){
            var wasActive = accordion.find('li.active');
            wasActive.removeClass('active');
           (li).addClass('active');
          } else {
            li.addClass('active');
          }
        }
      });
    }
  };

  //////////////// Tabs
  Drupal.behaviors.Tabs = {
    attach: function (context, settings) {
      $('.tabs').each(function(){
        var tabs = $(this);
        tabs.after('<ul class="tabs-content">');
        tabs.find('li').each(function(){
            var currentTab      = $(this),
                tabContent      = currentTab.find('.tab__content').wrap('<li></li>').parent(),
                tabContentClone = tabContent.clone(true,true);
            tabContent.remove();
            currentTab.closest('.tabs-container').find('.tabs-content').append(tabContentClone);
        });
      });

      $('.tabs li').on('click', function(){
        var clickedTab    = $(this),
            tabContainer  = clickedTab.closest('.tabs-container'),
            activeIndex   = (clickedTab.index()*1)+(1),
            activeContent = tabContainer.find('> .tabs-content > li:nth-of-type('+activeIndex+')'),
            iframe, radial;

        tabContainer.find('> .tabs > li').removeClass('active');
        tabContainer.find('> .tabs-content > li').removeClass('active');

        clickedTab.addClass('active');
        activeContent.addClass('active');


        // If there is an <iframe> element in the tab, reload its content when the tab is made active.
        iframe = activeContent.find('iframe');
        if(iframe.length){
          iframe.attr('src', iframe.attr('src'));
        }

      });

      $('.tabs li.active').trigger('click');
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
