export default () => {
    const yMap = document.querySelector('.map');

    if (yMap) {
        ymaps.ready(function () {
            var myMap = new ymaps.Map(
                'map',
                {
                    center: [51.999632, 47.817394],
                    zoom: 16,
                    controls: [],
                    behaviors: [
                        'drag',
                        'dblClickZoom',
                        'rightMouseButtonMagnifier',
                        'multiTouch',
                    ],
                },
                {
                    searchControlProvider: 'yandex#search',
                }
            );

            myMap.geoObjects.add(
                new ymaps.Placemark(
                    [51.999632, 47.817394],
                    {
                        // Чтобы балун и хинт открывались на метке, необходимо задать ей определенные свойства.
                        balloonContentHeader: 'Эко-прайс',
                        balloonContentBody:
                            'Саратовская область, г.Балаково, ул.Транспортная, д. 3А/2',
                        balloonContentFooter:
                            'Телефон: +7 937 029-07-77 <br>Доп.телефон: +7 927 053-12-12 <br> E-mail: info@eco-price.ru',
                        hintContent: 'Эко-прайс',
                    },
                    {
                        // Опции.
                        // Необходимо указать данный тип макета.
                        iconLayout: 'default#image',
                        // Своё изображение иконки метки.
                        iconImageHref:
                            '/wp-content/themes/ep/assets/files/icons/svg/icon--pin.svg',
                        // Размеры метки.
                        iconImageSize: [50, 62.16],
                        // Смещение левого верхнего угла иконки относительно
                        // её "ножки" (точки привязки).
                        iconImageOffset: [-25, -58],
                    }
                )
            );
        });
    }
};
