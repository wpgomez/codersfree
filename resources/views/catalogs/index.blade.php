<x-admin-layout>
    <div id="app">
        <h1>INICIO</h1>
        <vue-example></vue-example>
    </div>
    
    
    <div class="container py-8">

        <div id="magazine">
            <div style="background-image:url(pages/1.jpg);"></div>
            <div style="background-image:url(pages/2.jpg);"></div>
            <div style="background-image:url(pages/3.jpg);"></div>
            <div style="background-image:url(pages/4.jpg);"></div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                $('#magazine').turn({
                    width: 950,
                    height: 700,
                    autoCenter: true,
                    display: 'double',
                    acceleration: true,
                    gradients: !$.isTouch,
                    elevation:50,
                    when: {
                        turned: function(e, page) {
                            /*console.log('Current view: ', $(this).turn('view'));*/
                        }
                    }
                });
            });
            
            
            $(document).bind('keydown', function(e){
                
                if (e.keyCode==37)
                    $('#magazine').turn('previous');
                else if (e.keyCode==39)
                    $('#magazine').turn('next');
                    
            });
        </script>
    @endpush
</x-admin-layout>    