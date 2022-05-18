import React, {useEffect, useState} from "react";
import Post from "./Post";

export default function PostList() {
    const [postList, setPostList] = useState([]);


    useEffect(() => {
        fetch("http://localhost:5555/getpost.php", {
            method: 'GET',
            mode: 'cors'
        })
            .then(resp => resp.json())
            .then(respJSON => setPostList(respJSON) )
            .catch((error) => {
                console.error(error);
            });

    },[])


    return (
        <>
            <br />
            <h1 className="text-center">Liste des posts</h1>
            <div className="container">
            {postList ? postList.map((post,e) => {
                return <Post key={e} postTitle={post.Title} postContent={post.Content} postAuthor={post.Username} />;
            }) : ''}
            </div>
        </>
    );
}