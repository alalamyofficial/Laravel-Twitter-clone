document.addEventListener("turbolinks:load", function() {
    window.onload = function em(){   
        new FgEmojiPicker({
            
            trigger: ["#btn"],
            position: ["bottom", "right"],
            dir: "js/",
            emit(obj, triggerElement) {
                    const emoji = obj.emoji;
                    document.querySelector("#example1").value += emoji;
            }
            
        });
    
    };
})

    function em1(){ 
    
        new FgEmojiPicker({
                
            trigger: ["#btn1"],
            position: ["bottom", "right"],
            dir: "js/",
            emit(obj, triggerElement) {
                    const emoji = obj.emoji;
                    document.querySelector("#example2").value += emoji;
            }
            
        });
    };    
 



