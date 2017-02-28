#!/bin/sh
curl -H "Content-Type: application/json" \
       -H "Authorization: token c43ccdc82959e644920b8dd0a1c9a45da6d91913" \
       --data '{"body":"Hello World, :+1:"}' \
       https://api.github.com/repos/wxipn/Exercice/issues/1/comments
{
  "id": 2,
  "html_url": "https://github.com/schacon/blink/issues/6#issuecomment-2"
  "user": {
    "login": "wxipn",
    "id": 25324257,
    "avatar_url": "https://avatars3.githubusercontent.com/u/25324257?v=3&s=88",
    "type": "User",
  },
  "created_at": "2017-02-28T10:48:19Z",
  "updated_at": "2017-02-28T10:48:19Z",
  "body": "Hello World, :+1:"
}
