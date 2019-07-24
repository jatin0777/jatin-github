// shiftMenu
+(function($) {

    this.classToggler = function (param) {

        this.animation = param.animation,
        this.toggler = param.toggler,
        this.className = param.className,
        this.exceptions = param.exceptions;

        this.init = function() {
            var that = this;
            // for stop propagation
            var stopToggler = this.implode(this.exceptions);
            if (typeof stopToggler !== 'undefined') {
                $(document).on('click', stopToggler, function(e) {
                    e.stopPropagation();
                });
            }

            // for toggle class
            var toggler = this.implode(this.toggler);
            if (typeof toggler !== 'undefined') {

                $(document).on('click', toggler, function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    that.toggle();
                });
            }
        }

        //class toggler
        this.toggle = function() {
            var selectors = this.implode(this.animation);
            if (typeof selectors !== 'undefined') {
                $(selectors).toggleClass(this.className);
            }
        }

        // array selector maker
        this.implode = function(arr, imploder) {

            // checking arg is array or not
            if (!(arr instanceof Array)) {
                return arr;
            }
            // setting default imploder
            if (typeof imploder == 'undefined') {
                imploder = ',';
            }

            // making selector
            var data = arr;
            var ele = '';
            for (var j = 0; j < arr.length; j++) {
                ele += arr[j];
                if (j !== arr.length - 1) {
                    ele += imploder;
                }
            }
            data = ele;
            return data;
        }
    } //End mobileMenu




    $.fn.mrMobileMenu = function(config) {
        /* defining default config*/
        var defaultConfig = {
            icon: '#menu-icon',
            closeIcon: true,
            overlay: true
        }
        $.extend(defaultConfig, config);

        var _this = this;
        var shiftMenu = function() {
            var $icon = $(defaultConfig.icon),
                mobileMenuHTML = $(_this.selector).html(),
                that = this;

            /* constructor function */
            this.init = function() {
                $(document).ready(function() {
                    that.createMenu();
                    that.addDownArrow();
                    that.toggleSubUl();
                    that.menuToggler();
                    that.addClassOnFirstUl();
                });
            };

            this.createMenu = function() {
                var closeHTML = defaultConfig.closeIcon ? this.closeMenuIcon() : null,
                    overlayHTML = defaultConfig.overlay ? this.addOverlay() : null;
                    $('body').append('<div class="mr-mobile-menu" id="mr-mobile-menu">' + closeHTML + mobileMenuHTML + '</div>' + overlayHTML)
            };

            this.closeMenuIcon = function() {
                return ('<div class="mr-close-wrapper"> <span class="mr-inner-box" id="mr-close"><span class="mr-inner"></span></span> </div>');
            };

            this.addOverlay = function() {
                return ('<div class="mr-mobile-menu-overlay"></div>');
            };

            this.addClassOnFirstUl = function(){
              if($('#mr-mobile-menu ul').first().hasClass('menu')){
              }else{
                $('#mr-mobile-menu ul').first().addClass('menu');
              }
            }

            this.addDownArrow = function() {
                var $mobileMenu = $('#mr-mobile-menu'),
                    $hasSubUl = $('#mr-mobile-menu .menu-item-has-children'),
                    haveClassOnLi = $mobileMenu.find('.menu-item-has-children');

                if (haveClassOnLi.length > 0) {
                    $hasSubUl.children('a').append('<span class="mr-arrow-box"><span class="mr-down-arrow"></span></span>');
                } else {
                    $('#mr-mobile-menu ul li:has(ul)').children('a').append('<span class="mr-arrow-box"><span class="mr-down-arrow"></span></span>');
                }
            };

            this.toggleSubUl = function() {
                $(document).on('click', '.mr-arrow-box', toggleSubMenu);

                function toggleSubMenu(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    $(this).toggleClass('open').parent().next().slideToggle();
                }
            };

            this.menuToggler = function() {
              var menuConfig = {
                  animation: ['.mr-mobile-menu-overlay', '#mr-mobile-menu', 'body', '#menu-icon'], //where class add element
                  exceptions: ['#mr-mobile-menu'], //stop propagation
                  toggler: ['#menu-icon', '.mr-mobile-menu-overlay', '#mr-close'],//class toggle on click
                  className:'mr-menu-open'
              };
              new classToggler( menuConfig ).init();
            };

        }; /* End shiftMenu */

        /* instance of shiftmenu */
        new shiftMenu().init();

    }; /* End shiftMenu */


})(jQuery);
