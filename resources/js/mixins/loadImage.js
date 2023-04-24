export default function loadImage( image ) {
    const origin = window.location.origin

    return `${ origin }/storage/${ image }`
}