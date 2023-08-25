    </div> 
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('popper/popper.min.js') }}"></script>
    <script src="{{ asset('tom-select/js/tom-select.js')}}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script>
        document.querySelectorAll('.selectMultiple').forEach((el)=>{
            new TomSelect(el,{plugins: {remove_button: {title:'Supprimer'}}})
        });
    </script>
</body>
</html>