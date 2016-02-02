/**
 * Created by 宏 on 2016/2/1.
 */
jQuery.fn.extend({
    quanxuan : function() {
        this.prop('checked', true);
    },
    quxiao : function() {
        this.prop('checked', false);
    },
    fanxuan : function() {
        for ( var i = 0; i < this.length; i++) {
            if (this[i].checked == true) {

                this[i].checked = false;
            } else {
                this[i].checked = true;
            }
        }
    }
});