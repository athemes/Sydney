var sydney = sydney || {};

/**
 * Back to top
 */
sydney.backToTop = {
	init: function() {
		this.displayButton();	
	},

	setup: function() {
		let icon 	= document.getElementsByClassName( 'go-top' )[0];

		var vertDist = window.scrollY;

		if ( vertDist > 800 ) {
			icon.classList.add( 'show' );
		} else {
			icon.classList.remove( 'show' );
		}
	
		icon.addEventListener( 'click', function() {
			window.scrollTo({
				top: 0,
				left: 0,
				behavior: 'smooth',
			});
		} );
	},

	displayButton: function() {
		this.setup();

		window.addEventListener( 'scroll', function() {
			this.setup();
		}.bind( this ) );		
	},
};

/**
 * Back to top
 */
sydney.backToTop = {
	init: function() {
		this.displayButton();	
	},

	setup: function() {
		const icon 	= document.getElementsByClassName( 'go-top' )[0];

		var vertDist = window.scrollY;

		if ( vertDist > 800 ) {
			icon.classList.add( 'show' );
		} else {
			icon.classList.remove( 'show' );
		}
	
		icon.addEventListener( 'click', function() {
			window.scrollTo({
				top: 0,
				left: 0,
				behavior: 'smooth',
			});
		} );
	},

	displayButton: function() {
		this.setup();

		window.addEventListener( 'scroll', function() {
			this.setup();
		}.bind( this ) );		
	},
};

/**
 * Remove preloader
 */
sydney.removePreloader = {
	init: function() {
		this.remove();	
	},

	remove: function() {
		const preloader 	= document.getElementsByClassName( 'preloader' )[0];

        preloader.classList.add( 'disable' );
        setTimeout(function(){ preloader.classList.add( 'hide' ); }, 600);
	},
};

/**
 * Sticky menu
 */
sydney.stickyMenu = {
	init: function() {
        this.headerClone();	
        
		window.addEventListener( 'resize', function() {
			this.headerClone();
        }.bind( this ) );	     
        
        this.sticky();

		window.addEventListener( 'scroll', function() {
			this.sticky();
        }.bind( this ) );	        
	},

	headerClone: function() {

        const header         = document.getElementsByClassName( 'site-header' )[0];
        const headerClone    = document.getElementsByClassName( 'header-clone' )[0];

		if ( ( typeof( headerClone ) == 'undefined' && headerClone == null ) || ( typeof( header ) == 'undefined' && header == null ) ) {
			return;
		}        

        headerClone.style.height = header.offsetHeight + 'px';
    },

	sticky: function() {

        const header = document.getElementsByClassName( 'site-header' )[0];
        
        if ( typeof( header ) == 'undefined' && header == null ) {
			return;
        }
        
		var vertDist = window.scrollY;
        var elDist 	 = header.offsetTop;
        

        if ( vertDist >= elDist) {
			header.classList.add( 'fixed' );
            document.body.classList.add( 'siteScrolled' );
        } else {
			header.classList.remove( 'fixed' );
            document.body.classList.remove( 'siteScrolled' );            
        }
        if ( vertDist >= 107 ) {
            header.classList.add( 'float-header' );
        } else {
            header.classList.remove( 'float-header' );
        }

    },

};

/**
 * Mobile menu
 */
sydney.mobileMenu = {
	init: function() {
        this.menu();
        
		window.addEventListener( 'resize', function() {
			this.menu();
        }.bind( this ) );
	},

	menu: function() {

        if ( window.matchMedia( "(max-width: 1024px)" ).matches ) {
            const mobileMenu = document.getElementsByClassName( 'mainnav' )[0];          
            const menuToggle = document.getElementsByClassName( 'btn-menu' )[0];

            mobileMenu.setAttribute( 'id', 'mainnav-mobi' );

            mobileMenu.classList.add( 'hidden' );

            var itemsWithChildren = mobileMenu.querySelectorAll( '.menu-item-has-children' );
            const svgSubmenu = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/></svg>';

            for ( const itemWC of itemsWithChildren ) {
                itemWC.getElementsByTagName( 'ul' )[0].style.display = 'none';
                itemWC.getElementsByTagName( 'a' )[0].insertAdjacentHTML('beforeend', '<span class="btn-submenu">' + svgSubmenu + '</span>');
            }

            this.toggle( menuToggle, mobileMenu );

            const submenuToggles 	= mobileMenu.querySelectorAll( '.btn-submenu' );
            for ( const submenuToggle of submenuToggles ) {
                this.submenuToggle( submenuToggle );                    
            }
        } else {
            const mobile = document.getElementById( 'mainnav-mobi' );

            if ( typeof( mobile ) != 'undefined' && mobile != null ) {
                mobile.setAttribute( 'id', 'mainnav' );
                const submenuToggles 	= mobile.querySelectorAll( '.btn-submenu' );
                for ( const submenuToggle of submenuToggles ) {
                    submenuToggle.remove();                    
                }                
            }
        }
    },
    
    toggle: function( menuToggle, mobileMenu ) {
        menuToggle.addEventListener( 'click', function(e) {
            e.preventDefault();
            if ( mobileMenu.classList.contains( 'toggled' ) ) {
                mobileMenu.classList.remove( 'toggled' );
            } else {
                mobileMenu.classList.add( 'toggled' ); 
            }
            e.stopImmediatePropagation()
        } );
    },

    submenuToggle: function( submenuToggle ) {
        submenuToggle.addEventListener( 'click', function(e) {
            e.preventDefault();
            var parent = submenuToggle.parentNode.parentNode;
            parent.getElementsByClassName( 'sub-menu' )[0].classList.toggle( 'toggled' );
        } );
    },    
};

/**
 * Responsive videos
 */
sydney.responsiveVideos = {
	init: function() {
		window.addEventListener('load', function() {

			var selectors = [
				'iframe[src*="player.vimeo.com"]',
				'iframe[src*="youtube.com"]',
				'iframe[src*="youtube-nocookie.com"]',
				'iframe[src*="kickstarter.com"][src*="video.html"]',
				'object',
				'embed'
			];

			selectors.forEach(element => {
				reframe(element);
			});
		})
	},
};

/**
 * DOM ready
 */
function sydneyDomReady( fn ) {
	if ( typeof fn !== 'function' ) {
		return;
	}

	if ( document.readyState === 'interactive' || document.readyState === 'complete' ) {
		return fn();
	}

	document.addEventListener( 'DOMContentLoaded', fn, false );
}

sydneyDomReady( function() {
    sydney.backToTop.init();
    sydney.removePreloader.init();
    sydney.stickyMenu.init();
	sydney.mobileMenu.init();
	sydney.responsiveVideos.init();
} );

/**
  reframe.js - Reframe.js: responsive iframes for embedded content
  @version v3.0.2
  @link https://github.com/yowainwright/reframe.ts#readme
  @author Jeff Wainwright <yowainwright@gmail.com> (http://jeffry.in)
  @license MIT
**/
(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? module.exports = factory() :
    typeof define === 'function' && define.amd ? define(factory) :
    (global = typeof globalThis !== 'undefined' ? globalThis : global || self, global.reframe = factory());
}(this, (function () { 'use strict';

    /*! *****************************************************************************
    Copyright (c) Microsoft Corporation.
    Permission to use, copy, modify, and/or distribute this software for any
    purpose with or without fee is hereby granted.
    THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES WITH
    REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF MERCHANTABILITY
    AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY SPECIAL, DIRECT,
    INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES WHATSOEVER RESULTING FROM
    LOSS OF USE, DATA OR PROFITS, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR
    OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR
    PERFORMANCE OF THIS SOFTWARE.
    ***************************************************************************** */

    function __spreadArrays() {
        for (var s = 0, i = 0, il = arguments.length; i < il; i++) s += arguments[i].length;
        for (var r = Array(s), k = 0, i = 0; i < il; i++)
            for (var a = arguments[i], j = 0, jl = a.length; j < jl; j++, k++)
                r[k] = a[j];
        return r;
    }

    /**
     * REFRAME.TS 🖼
     * ---
     * @param target
     * @param cName
     * @summary defines the height/width ratio of the targeted <element>
     */
    function reframe(target, cName) {
        if (cName === void 0) { cName = 'js-reframe'; }
        var frames = typeof target === 'string' ? __spreadArrays(document.querySelectorAll(target)) : 'length' in target ? __spreadArrays(target) : [target];
        return frames.forEach(function (frame) {
            var _a, _b;
            var hasClass = frame.className.split(' ').indexOf(cName) !== -1;
            if (hasClass || frame.style.width.indexOf('%') > -1) {
                return;
            }
            // get height width attributes
            var height = frame.getAttribute('height') || frame.offsetHeight;
            var width = frame.getAttribute('width') || frame.offsetWidth;
            var heightNumber = typeof height === 'string' ? parseInt(height) : height;
            var widthNumber = typeof width === 'string' ? parseInt(width) : width;
            // general targeted <element> sizes
            var padding = (heightNumber / widthNumber) * 100;
            // created element <wrapper> of general reframed item
            // => set necessary styles of created element <wrapper>
            var div = document.createElement('div');
            div.className = cName;
            var divStyles = div.style;
            divStyles.position = 'relative';
            divStyles.width = '100%';
            divStyles.paddingTop = padding + "%";
            // set necessary styles of targeted <element>
            var frameStyle = frame.style;
            frameStyle.position = 'absolute';
            frameStyle.width = '100%';
            frameStyle.height = '100%';
            frameStyle.left = '0';
            frameStyle.top = '0';
            // reframe targeted <element>
            (_a = frame.parentNode) === null || _a === void 0 ? void 0 : _a.insertBefore(div, frame);
            (_b = frame.parentNode) === null || _b === void 0 ? void 0 : _b.removeChild(frame);
            div.appendChild(frame);
        });
    }

    return reframe;

})));