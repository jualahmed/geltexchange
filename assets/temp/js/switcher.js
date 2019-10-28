		jQuery(document).ready(function($){
			$('.preset-list li a').on('click',function(event){
				event.preventDefault();
				var color = $(this).data('color'),
					var url = $("#url").val();
					url = url + 'assets/css/presets/'+color+'.css';
					logoSrc = 'images/presets/'+color+'/logo.png';
				
				$('#preset').attr('href', url);
			});

			$('.style-chooser .toggler').on('click', function(event){
				event.preventDefault();
				$(this).closest('.style-chooser').toggleClass('opened');
			});
		});