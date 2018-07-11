## Thor Odinson
> Families can be tough. Look, before my father died, he told me I had a half-sister that he imprisoned in Hell. Then she returned home, and stabbed me in the eye, so I had to kill her. It’s life, there was nothing else, and I feel your pain.

TaniGroup create VPN profile endpoint

## Prerequisites
- [Docker](https://docs.docker.com/install/)

## Getting started
```
# development
docker compose up -f docker-compose.dev.yaml -d --build

# production
docker compose up -f docker-compose.production.yaml -d --build
```

## Available endpoints
| METHODS | ENDPOINTS | PARAMS |
| --- | --- | --- |
| GET | / | |
| GET | /client-list | |
| POST | /create-client | `username`, `email` |
| POST | /remove-client | `username` |