import React from 'react'; //чтобы использовать в др частях приложения import MyComponent from '../components/MyComponent';

function MyComponent() {
    return (
        React.createElement('div', null, //div - контейнер для заголовка h1
        React.createElement('h1', null, 'hello!')
        )
    );
}

export default MyComponent; //экспортирует MyComponent, др файлы могут использовать этот компонент с помощью import