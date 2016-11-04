jQuery(document).ready(function($){

    $('button.switch').click(function(e){
        
        $('input.variables').each(function(){
            var id = this.id;
            var val = $(this).val();
            var name = $(this).attr('name');

            $('pre').each(function(){
                var current = $(this).html();
                current = current.replace("&lt;variable:" + name + "&gt;", "<strong>" + val + "</strong>");
                $(this).html(current);
            });

            $('div.text').each(function(){
                var current = $(this).html();
                current = current.replace(new RegExp("{variable:" + name + "}", 'g'),val);
                $(this).html(current);
            });

        });
            
        e.preventDefault();

    });
});
