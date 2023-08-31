    </div> 
    
    <script>
        document.querySelectorAll('.selectMultiple').forEach((el)=>{
            new TomSelect(el,{plugins: {remove_button: {title:'Supprimer'}}})
        });
    </script>
</body>
</html>