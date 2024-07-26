document.addEventListener('DOMContentLoaded', function () {
    var dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
    var dropdownContents = document.querySelectorAll('.dropdown-content');

    for (var i = 0; i < dropdownTriggers.length; i++) {
        var dropdownTrigger = dropdownTriggers[i];
        var dropdownContent = dropdownContents[i];
        var isHoveringTrigger = false;
        var isHoveringContent = false;

        // Event listeners para el enlace

        dropdownTrigger.addEventListener('mouseover', function () {
            isHoveringTrigger = true;
            showDropdownContent();
        });

        dropdownTrigger.addEventListener('mouseout', function () {
            isHoveringTrigger = false;
            hideDropdownContent();
        });

        // Event listeners para el menú desplegable

        dropdownContent.addEventListener('mouseover', function () {
            isHoveringContent = true;
            showDropdownContent();
        });

        dropdownContent.addEventListener('mouseout', function () {
            isHoveringContent = false;
            hideDropdownContent();
        });
    }

    function showDropdownContent() {
        if (isHoveringTrigger || isHoveringContent) {
            dropdownContent.style.display = 'block';
        }
    }

    function hideDropdownContent() {
        setTimeout(function () {
            if (!isHoveringTrigger && !isHoveringContent) {
                dropdownContent.style.display = 'none';
            }
        }, 200); // Esperamos 200ms antes de ocultar el menú desplegable
    }
});
