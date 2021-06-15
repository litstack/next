const ids = {};

function id(id, increment = true) {
    if (!(id in ids)) {
        ids[id] = 0;
    }

    let count = ids[id];

    if (increment) {
        ids[id]++;
    }

    return count == 0 ? id : `${id}__${count}`;
}

export { id };
