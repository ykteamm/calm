<script>
    function resultCollapser(id){
        var ids = [
            'resultHeaderLogo',
            'resultHeaderCloseBtn',
            'resultBody',
            'resultIngridient',
            'resultCollapse',
            'resultCollapseClose',
            'resultCollapseMinus',
            'resultCollapsePlus'
        ];
        ids.forEach(item => {
            let element = document.getElementById(item+id);
            changeClass(element);
        });
    
    }
    function changeClass(element){
        if(element.style.display == 'none') {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    }
</script>