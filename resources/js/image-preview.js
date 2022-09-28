const placeholder = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4KK-Q2mcxD1oB5e3SPK-Sa0_eqpXkUaFe7t2gEuvYqA&s';
const preview = document.getElementById('preview');
const imageField = document.getElementById('image-field');

imageField.addEventListener('input', () => {
    preview.src = imageField.value || placeholder;
});