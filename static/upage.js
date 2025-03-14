//------------------------------------------------
//activate features
//------------------------------------------------

const toggleOnlyOne = (element) => {
    const activeElements = document.querySelectorAll('.botonat');

    activeElements.forEach(el => {
        if (el !== element) {
            el.classList.remove(
                'px-3', 'py-1', 'text-xs', 'rounded-full', 'border', 'border-title-green/30',
                'text-title-green', 'bg-title-green/10', 'hover:bg-title-green/20'
            );
            el.classList.add('text-text-cream/80', 'hover:text-title-green', 'hover:bg-title-green/10');

            el.classList.add ("border");
            el.classList.add ("rounded-full");
            el.classList.add ("border-title-green/30");
            el.classList.add ("text-xs");
            el.classList.add ("py-1");
            el.classList.add ("px-3");
            el.dataset.toggled = false;
        }
    });

    element.classList.add(
        'px-3', 'py-1', 'text-xs', 'rounded-full', 'border', 'border-title-green/30',
        'text-title-green', 'bg-title-green/10', 'hover:bg-title-green/20'
    );
    element.classList.remove('text-text-cream/80', 'hover:text-title-green', 'hover:bg-title-green/10');

    element.style.border = "";
    element.style.borderRadius = "";
    element.dataset.toggled = true;
};

document.querySelectorAll('.botonat').forEach(button => {
    button.addEventListener('click', () => toggleOnlyOne(button));
});
