# Documentation

Below are the instructions to build this image.

## Build Docs

Run the following commands from the root directory of this project to build and upload to hub.docker.com.

``` bash
docker build -t scorpion/php:<tag> .
docker push scorpion/php:<tag>
```

## Environment Variables

TODO: ENV Setup - while no .env file is required for build, we do need to revisit and add overrides to certain parts of the image.
