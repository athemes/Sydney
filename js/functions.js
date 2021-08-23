"use strict";

if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, thisArg) {
        thisArg = thisArg || window;
        for (var i = 0; i < this.length; i++) {
            callback.call(thisArg, this[i], i, this);
        }
    };
}

var sydney = sydney || {};

/**
 * Back to top
 */
sydney.backToTop = {
	init: function() {
		this.displayButton();	
	},

	setup: function() {
		const icon 	= document.getElementsByClassName( 'go-top' )[0];

		if ( typeof(icon) != 'undefined' && icon != null ) {
			var vertDist = window.pageYOffset;

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
		}
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
        
		var vertDist = window.pageYOffset;
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

            mobileMenu.classList.add( 'syd-hidden' );

            var itemsWithChildren = mobileMenu.querySelectorAll( '.menu-item-has-children' );
            const svgSubmenu = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"/></svg>';

			itemsWithChildren.forEach(
				function(currentValue, currentIndex, listObj) {
					currentValue.getElementsByTagName( 'ul' )[0].style.display = 'none';
					currentValue.getElementsByTagName( 'a' )[0].insertAdjacentHTML('beforeend', '<span class="btn-submenu">' + svgSubmenu + '</span>');
				},
				'myThisArg'
			);


            this.toggle( menuToggle, mobileMenu );

            const submenuToggles 	= mobileMenu.querySelectorAll( '.btn-submenu' );

			submenuToggles.forEach(
				function(currentValue, currentIndex, listObj) {
					currentValue.addEventListener( 'click', function(e) {
						e.preventDefault();
						var parent = currentValue.parentNode.parentNode;
						parent.getElementsByClassName( 'sub-menu' )[0].classList.toggle( 'toggled' );
					} );
				},
				'myThisArg'
			  );


        } else {
            const mobile = document.getElementById( 'mainnav-mobi' );

            if ( typeof( mobile ) != 'undefined' && mobile != null ) {
                mobile.setAttribute( 'id', 'mainnav' );
				mobile.classList.remove( 'toggled' );
                const submenuToggles = mobile.querySelectorAll( '.btn-submenu' );

				submenuToggles.forEach(
					function(currentValue, currentIndex, listObj) {
						currentValue.remove(); 
					},
					'myThisArg'
				  );				

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
} );

// Vanilla version of FitVids
// Still licencened under WTFPL
window.addEventListener("load", function() {
(function(window, document, undefined) {
	"use strict";
	
	// List of Video Vendors embeds you want to support
	var players = ['iframe[src*="youtube.com"]', 'iframe[src*="vimeo.com"]'];
	
	// Select videos
	var fitVids = document.querySelectorAll(players.join(","));
	
	// If there are videos on the page...
	if (fitVids.length) {
		// Loop through videos
		for (var i = 0; i < fitVids.length; i++) {
		// Get Video Information
		var fitVid = fitVids[i];
		var width = fitVid.getAttribute("width");
		var height = fitVid.getAttribute("height");
		var aspectRatio = height / width;
		var parentDiv = fitVid.parentNode;
	
		// Wrap it in a DIV
		var div = document.createElement("div");
		div.className = "fitVids-wrapper";
		div.style.paddingBottom = aspectRatio * 100 + "%";
		parentDiv.insertBefore(div, fitVid);
		fitVid.remove();
		div.appendChild(fitVid);
	
		// Clear height/width from fitVid
		fitVid.removeAttribute("height");
		fitVid.removeAttribute("width");
		}
	}
	})(window, document);
});

/**
 * Support for isotope + lazyload from third party plugins
 */
 window.addEventListener("load", function() {
	if( 
		typeof Isotope !== 'undefined' && 
		( 
			typeof lazySizes !== 'undefined' || // Autoptimize and others
			typeof lazyLoadOptions !== 'undefined' || // Lazy Load (by WP Rocket)
			typeof a3_lazyload_extend_params !== 'undefined' // a3 Lazy Load
		) 
	) {
		const isotopeContainer = document.querySelectorAll( '.isotope-container' );
		if( isotopeContainer.length ) {
			isotopeContainer.forEach(
				function(container) {
					
					const images = container.querySelectorAll( '.isotope-item img[data-lazy-src], .isotope-item img[data-src]' );
					if( images.length ) {
						images.forEach(function(image){
							if( image !== null ) {
								image.addEventListener( 'load', function(){
									// Currently the isotope container always is a jQuery object
									jQuery( container ).isotope('layout');
								} );
							}
						}, 'myThisArg');
					}
	
				},
				'myThisArg'
			);
		}
	}
});