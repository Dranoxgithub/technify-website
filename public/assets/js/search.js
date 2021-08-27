$(function() {
    const element = document.querySelector('#shuffleEntryPoint');
    const shuffle = new window.Shuffle(element, {
            itemSelector: '.card-container',
            filterMode: Shuffle.FilterMode.ANY,
        });
    document.getElementById('searchBox').addEventListener('keyup', handleSearchKeyup);

    function handleSearchKeyup(evt) {
        const searchText = evt.target.value.toLowerCase();
        shuffle.filter(element => {
            console.log('filtering...');
            
            const titleText = element.querySelector('.card-title').textContent.toLowerCase().trim();
            return titleText.indexOf(searchText) !== -1;
        });
    }
})

