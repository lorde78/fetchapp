import React from 'react'

export default function Post({postTitle, postContent, postAuthor}){
    return (
        <>
            <br />
            <div className="card mx-auto" style={{width:'25rem'}}>
                <div className="card-body bg-light">
                    <h4 className="card-title">{postTitle}</h4>
                    <span className="card-subtitle mb-2 text-muted">Par : {postAuthor}</span>
                    <p className="card-text">{postContent}</p>
                </div>
            </div>
        </>
    )
}

