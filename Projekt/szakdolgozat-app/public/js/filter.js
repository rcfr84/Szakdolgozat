document.addEventListener('DOMContentLoaded', function () 
{
    const filterCheckbox = document.getElementById('filterCheckbox');
    const filterSection = document.getElementById('filterSection');

    filterCheckbox.addEventListener('change', function () 
    {
        if (this.checked) 
        {
            filterSection.style.display = 'block';
        } 
        else 
        {
            filterSection.style.display = 'none';
        }
    });
});
