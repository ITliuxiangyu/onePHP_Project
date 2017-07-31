/**
 * Created by Administrator on 2016/8/20.
 */
$(function(){
    function  aa() {
        var i = $('.zjL,.chanpin').position().left;
        // var j = $('.toolbar').position().left;
        // alert(j)
        if (i == 0) {
            $('.zjL,.chanpin').animate({left:-200},'fast')
            $('.toolbar').animate({left:0},'fast')
        } else {
            $('.zjL,.chanpin').animate({left:0},'fast');
            // $('.zjL').css({'margin-left': '-200px'})
            $('.toolbar').animate({left:200},'fast');
        }
    }
    $('.toolbar').click(aa);
});
