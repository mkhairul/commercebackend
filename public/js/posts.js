(function($){
    var service = window.service = {};
    service.Post = (function(){
        var postConstructor = function Post(options){
            if (false === (this instanceof Post)) {
                return new Post();
            }
            var self = this;
            var defaultOptions = {
                url: '',
                form: '',
            }
            this.options = options = $.extend(defaultOptions, options)
            this.getOptions = function(){ return options; }
            this.setOptions = function(param){ options = $.extend(options, param) }
            
            if (this.options.form) {
                $(this.options.form).on('submit', function(){
                    self.submit();
                    return false;
                })
            }
        }
        
        postConstructor.prototype.submit = function(callback){
            var self = this
            // Collect all the input
            var param = {}
            $(this.options.form + ' *').filter(':input').not('button').each(function(index, el){
                if ($(el).attr('name') in param) {
                    var tmp = param[$(el).attr('name')];
                    if (typeof tmp == 'string') {
                        param[$(el).attr('name')] = new Array(tmp);
                    }
                    param[$(el).attr('name')].push($(el).val());
                }
                else
                {
                    param[$(el).attr('name')] = $(el).val()
                }
            })
            $.post(this.options.url, {'param':JSON.stringify(param)}, function(data){
                console.log(data);
                if (data.status == 'ok') {
                    $(':input', self.options.form)
                    .not(':button, :submit, :reset, :hidden')
                    .val('')
                    .removeAttr('checked')
                    .removeAttr('selected');
                }
                if (callback) {
                    callback();
                }
            }, 'json')
        }
        
        postConstructor.prototype.save = function(param, callback)
        {
            $.post(this.options.url, {'param':JSON.stringify(param)}, function(data){
                console.log(data);
                if (callback) {
                    callback();
                }
            }, 'json')
        }
        
        return postConstructor;
    }());
})(jQuery);