function filterKategori(kategori) {
  const cards = document.querySelectorAll('.card');
  cards.forEach(card => {
    if (kategori === 'semua' || card.dataset.kategori === kategori) {
      card.style.display = 'block';
    } else {
      card.style.display = 'none';
    }
  });
}
