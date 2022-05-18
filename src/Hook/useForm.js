import { useState, useEffect } from "react";

export default function useForm() {
    const [userLogged, setUserLogged] = useState([])

    const [values, setValues] = useState({
        username: '',
        password: '',
        title: '',
        content: ''
    });

    const handleChange = (e) => {
        const { name, value } = e.target;
        setValues({
            ...values,
            [name]: value
        });
    };

    const handleCreateUser = async (e) => {
        e.preventDefault()
        const data = values;
        await fetch('http://localhost:5555/createuser.php', {
            method: 'POST',
            mode: 'cors',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'Authorization': `Basic ${btoa(`${data.username}:${data.password}`)}`
            },
            body: JSON.stringify(data)
        }).then(resp => resp.json())
    }

    const handleLogin = async (e) => {
        e.preventDefault();
        const data = values;
        console.log(userLogged);
        await fetch('http://localhost:5555/getuser.php', {
            method: 'POST',
            mode: 'cors',
        })
            .then(resp => resp.json())
            .then(respJSON => {
                setUserLogged(respJSON.filter(user => user.Username === data.username && user.Password === data.password));
            })
    }

    const handleDeconnexion = async (e) => {
        setUserLogged();
    }

    const handlePost = async (e) => {
        e.preventDefault();
        const data = values;
        console.log(userLogged);
        await fetch('http://localhost:5555/createpost.php', {
            method: 'POST',
            mode: 'cors',
            body: JSON.stringify(data)
        }).then(resp => resp.json())
    }

    return { handleChange, values, userLogged, handlePost, handleDeconnexion, handleCreateUser, handleLogin };
}